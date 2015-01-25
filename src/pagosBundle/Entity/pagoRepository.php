<?php

namespace pagosBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\DBAL\DriverManager;

class pagoRepository extends EntityRepository
{
   public function facturar($lineas,$entidad,$cuenta) {

        $datos=array('serie'=>'',
                'folio'=>'',
                'empresa_id'=>'',
                'observaciones'=>'',
                'fecha'=>'',
                'cliente_id'=>$entidad->getClienteId(),
                'receptor_nombre'=>$entidad->getRazonSocial(),
                'receptor_rfc'=>$entidad->getRfc(),
                'calle'=>$entidad->getCalle(),
                'no_exterior'=>$entidad->getNoExterior(),
                'no_interior'=>$entidad->getNoInterior(),
                'referencia'=>$entidad->getReferencia(),
                'colonia'=>$entidad->getColonia(),
                'municipio'=>$entidad->getMunicipio(),
                'codigo_postal'=>$entidad->getCodigoPostal(),
                'localidad'=>$entidad->getLocalidad(),
                'estado'=>$entidad->getEstado(),
                'pais'=>$entidad->getPais(),
                'forma_de_pago'=>'Pago en una sola exhibición',
                'condiciones_de_pago'=>'',
                'moneda_id'=>'MXN',
                'tipo_cambio'=>'1',
                'metodo_de_pago'=>'targeta',
                'num_cuenta_pago'=>$cuenta,
                'fecha_vencimiento'=>date('d/m/Y'),
                'vendedor_id'=>'',
                'vendedor_nombre'=>'',
                'opReq1'=>'ventas:facturas_venta:facturas_venta:Add','operaciones'=>'2');
            $x=0;
            foreach ($lineas as $linea ) {
                $masDatos[]=array(
                        'conceptos['.$x.'][sku]'=>'SERVICIO',
                        'conceptos['.$x.'][cantidad]'=>$linea->getCantidad(),
                        'conceptos['.$x.'][no_identificacion]'=>'',
                        'conceptos['.$x.'][cuenta_predial_numero]'=>'',
                        'conceptos['.$x.'][precio_unitario]'=>$linea->getTotal(),
                        'conceptos['.$x.'][precio_lista]'=>$linea->getTotal(),
                        'conceptos['.$x.'][descuento]'=>'0',
                        'conceptos['.$x.'][tipo_descuento]'=>'F',
                        'conceptos['.$x.'][factor_descuento]'=>'0',
                        'conceptos['.$x.'][importe_precio_lista]'=>$linea->getTotal(),
                        'conceptos['.$x.'][importe]'=>$linea->getTotal(),
                        'conceptos['.$x.'][importe_ieps]'=>'0',
                        'conceptos['.$x.'][observaciones]'=>'',
                        'conceptos['.$x.'][unidad_id]'=>'PZ',
                        'conceptos['.$x.'][usa_lotes]'=>'N',
                        'conceptos['.$x.'][usa_series]'=>'N',
                        'conceptos['.$x.'][es_paquete]'=>'N',
                        'conceptos['.$x.'][almacenable]'=>'N',
                        'conceptos['.$x.'][costo]'=>'0',
                        'conceptos['.$x.'][impuestos_traslados][0][esquema_impuestos_id]'=>'IVA_GENERAL',
                        'conceptos['.$x.'][impuestos_traslados][0][impuesto]'=>'IVA',
                        'conceptos['.$x.'][impuestos_traslados][0][aplicacion]'=>'T',
                        'conceptos['.$x.'][impuestos_traslados][0][tasa]'=>'16.0000',
                        'conceptos['.$x.'][impuestos_traslados][0][num_impuesto]'=>'1',
                        'conceptos['.$x.'][impuestos_traslados][0][importe]'=>'0.16',
                        'conceptos['.$x.'][pedido_serie]'=>'',
                        'conceptos['.$x.'][pedido_folio]'=>'',
                        'conceptos['.$x.'][pedido_item]'=>'',
                        'conceptos['.$x.'][impuestos_retenciones]'=>'',
                        'conceptos['.$x.'][lista_precios_id]'=>'',
                        'conceptos['.$x.'][descripcion]'=>'SERVICIO'
                            );
               $x++;
            }

            $req='';
            $req1='';
            foreach ($datos as $key => $value)
                    {
                        $fullipnA[$key] = $value; 
                        $encodedvalue = urlencode(stripslashes($value));
                        $req .= "&$key=$encodedvalue";
                    }

            for($i=0;$i<count($masDatos); $i++){
                foreach ($masDatos[$i] as $key => $value)
                        {
                            $fullipnA[$key] = $value; 
                            $encodedvalue = urlencode(stripslashes($value));
                            $req1 .= "&$key=$encodedvalue";
                        }
                    }
                
                //  echo $req;
            $url='https://e.sisnet.mx:7443/SisnetV3/php/responseweb.php';
            $curl_result=$curl_err='';
            $varPost="&workspace=default&usuario=demo&contrasena=demo&sucursal=aps_01|MATRIZ|43&resultType=xml";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_CERTINFO,true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false);
            
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$varPost.$req.$req1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $datos= curl_exec ($ch);
            curl_close ($ch);
            //echo $datos;
            $resultado=explode('||', $datos);
            $max_int_length = strlen((string) PHP_INT_MAX) - 1;
            $json_without_bigints = preg_replace('/:\s*(-?\d{'.$max_int_length.',})/', ': "$1"', $resultado[1]);
           // echo $json_without_bigints;
            $elarrid = json_decode($json_without_bigints,true, 512);
            return $elarrid['record'];
   }
public function sellar($datos,$usuario){
    $valores=array('opReq1'=>'ventas:facturas_venta:facturas_venta:OpenCFD',
                    'empresa_id'=>$datos['empresa_id'],
                    'serie'=>$datos['serie'],
                    'folio'=>$datos['folio'],
                    'preview'=>'true',
                    'opReq2'=>'ventas:facturas_venta:facturas_venta:SendMail',
                    'nombre'=>$usuario->getNombre(),
                    'correo'=>$usuario->getEmail(),'operaciones'=>'3');
    $req='';
    foreach ($valores as $key => $value)
                    {
                        $fullipnA[$key] = $value; 
                        $encodedvalue = urlencode(stripslashes($value));
                        $req .= "&$key=$encodedvalue";
                    }

    $url='https://e.sisnet.mx:7443/SisnetV3/php/responseweb.php';
            $curl_result=$curl_err='';
            $varPost="&workspace=default&usuario=demo&contrasena=demo&sucursal=aps_01|MATRIZ|43&resultType=xml";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_CERTINFO,true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false);
            
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$varPost.$req);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            //$datos= curl_exec ($ch);
            curl_close ($ch);
            echo $datos;
            $resultado=explode('||', $datos);
            /*$max_int_length = strlen((string) PHP_INT_MAX) - 1;
            $json_without_bigints = preg_replace('/:\s*(-?\d{'.$max_int_length.',})/', ': "$1"', $resultado[1]);
           // echo $json_without_bigints;
            $elarrid = json_decode($json_without_bigints,true, 512);*/

}


public function addMonth($dates,$num = 1,$format='d/m/Y')
    {
        $date = $dates->format('Y-n-j');
        list($y, $m, $d) = explode('-', $date);
        $m += $num;
        while ($m > 12)
        {
            $m -= 12;
            $y++;
        }
        $last_day = date('t', strtotime("$y-$m-1"));
        if ($d > $last_day)
        {
            $d = $last_day;
        }

        $dates->setDate($y, $m, $d);
        return $dates->format($format);
    }
}
