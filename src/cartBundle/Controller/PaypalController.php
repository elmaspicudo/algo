<?php

namespace cartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use cartBundle\Entity\carrito;
use pagosBundle\Entity\pago;
use pagosBundle\Entity\detallePago;
use modulosBundle\Entity\moduloContratado;

class PaypalController extends Controller
{
    public function indexAction()
    {
        return $this->render('cartBundle:Default:index.html.twig', array('name' => 'hola'));
    }

    //mostram os el resultado exitoso de la transaccion y pasamos los productos del carrito a una orden de compra
    public function exitoAction($masked)
    {
    	//echo $track;
    	$em = $this->getDoctrine()->getManager();
    	$track = base64_decode($masked);
    	echo $track;
		@list($oper,$carrito,$llave,$userid) = explode('|',$track);
		$usuario= $em->getRepository('userBundle:usuario')->find($userid);
        $entity = $em->getRepository('cartBundle:carrito')->findOneBy(array('id'=>$carrito,'usuario'=>$usuario)); 
        $entity->setStatus(2);
        $em->persist($entity);
        $em->flush();
        $this->addPagoAndProductocontratado($entity);
        return $this->render('cartBundle:Default:index.html.twig', array('name' =>'Transaccion exitosa'));
    }
    // mostramos que la transaccion no tuvo exito
    public function cancelAction()
    {
        return $this->render('cartBundle:Default:index.html.twig', array('name' => 'Transaccion fallida'));
    }

    /* indicar el estado de la compra, y conceder al usuario acceso al servicio o la descarga adquiridos, o bien enviar el producto adquirido una vez el pago se ha completado con éxito (payment_status=”Completed”).*/
    public function notifyAction(Request $request)
    {
    	$payaltest = true; //cambialo a false para realizar transacciones reales, de lo contrario utiliza sandbox.
 
		$req = 'cmd=_notify-validate';
		$fullipnA = array();
		 
		foreach ($_POST as $key => $value)
		{
			$fullipnA[$key] = $value; 
			$encodedvalue = urlencode(stripslashes($value));
			$req .= "&$key=$encodedvalue";
		}
		 
		$fullipn = Array2Str(" : ", "\n", $fullipnA);
 
		if (!$payaltest) 	
		{
			$url ='https://www.paypal.com/cgi-bin/webscr';			 
		}else{			 
			$url ='https://www.sandbox.paypal.com/cgi-bin/webscr'; 			 
		}
 
		$curl_result=$curl_err='';
		$fp = curl_init();
		curl_setopt($fp, CURLOPT_URL,$url);
		curl_setopt($fp, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($fp, CURLOPT_POST, 1);
		curl_setopt($fp, CURLOPT_POSTFIELDS, $req);
		curl_setopt($fp, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", "Content-Length: " . strlen($req)));
		curl_setopt($fp, CURLOPT_HEADER , 0); 
		curl_setopt($fp, CURLOPT_VERBOSE, 1);
		curl_setopt($fp, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($fp, CURLOPT_TIMEOUT, 30);
		 
		$response = curl_exec($fp);
		$curl_err = curl_error($fp);
		curl_close($fp); 
		// Variables enviadas por Paypal
		$item_name = $_POST['item_name'];
		$item_number = $_POST['item_number'];
		$payment_status = $_POST['payment_status'];
		$payment_amount = $_POST['mc_gross'];
		$payment_currency = $_POST['mc_currency'];
		$txn_id = $_POST['txn_id'];
		$receiver_email = $_POST['receiver_email'];
		$payer_email = $_POST['payer_email'];
		$txn_type = $_POST['txn_type'];
		$pending_reason = $_POST['pending_reason'];
		$payment_type = $_POST['payment_type'];
		$custom_key = $_POST['custom']; 
 
		if (strcmp ($response, "VERIFIED") == 0)		
		{
			// Verifico el estado de la orden
			if ($payment_status != "Completed")
			{
				echo "El pago no fue aceptado por paypal - Estado del Pago: $payment_status";
				//StopProcess();
			}else{
				echo "Pago Correcto - $fullipn"; //notifico al webmaster				
			}		 
		 
		  }else{ //la transacci�n es invalida NO se puedo cobrarle al cliente.
		 
				echo "Pago Invalido - $fullipn";
			}
    }

    private function addPagoAndProductocontratado(&$carrito){
    	$em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $usuario= $em->getRepository('userBundle:usuario')->find($user->getId());
        if($usuario){
	    	$lines=$em->getRepository('cartBundle:itemCarrito')->findBy(array('carrito'=>$carrito));
	    	$fecha=new \DateTime("now");
	    	$entidadPago=new pago();
	    	$entidadPago->setFecha($fecha);
	    	$entidadPago->setMonto(0);
	    	$entidadPago->setReferencia('carrito|'.$carrito->getId());
	    	$entidadPago->setUsuario($usuario);
	    	$em->persist($entidadPago);
            $em->flush();
	    	foreach ($lines as $line ) {
	    		$entidaDetalle=new detallePago();
	    		$producto=$line->getProducto();
	    		$entidaDetalle->setPrecio($producto->getPrecio());
	    		$entidaDetalle->setCantidad($line->getCantidad());
	    		$entidaDetalle->setTotal($line->getTotal());
	    		$entidaDetalle->setProducto($producto);
	    		$entidaDetalle->setPago($entidadPago);
	    		$em->persist($entidaDetalle);
           		$em->flush();

				$entidadProducto=new moduloContratado();
				$entidadProducto->setFechaCorte($fecha);
				$entidadProducto->setFecha($fecha);
				$entidadProducto->setUsuario($usuario);
				$entidadProducto->setProducto($line->getProducto());
				$entidadProducto->setPeriodo($line->getPeriodo());
				$entidadProducto->setCantidadPeriodo($line->getCantidadPeriodo());
				$entidadProducto->setRenta($line->getRenta());
				$em->persist($entidadProducto);
           		$em->flush();
	    	}
	   	}
    }

}
