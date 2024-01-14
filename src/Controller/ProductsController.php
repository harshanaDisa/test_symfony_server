<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductsController
{


    #[Route('/products')]
    public function index()
    {
        return new Response('Products!');
    }

    

    #[Route('/products/{id}/lowest-price', name: 'products_lowest_price', methods: ['POST'])]
    public function lowestPrice(Request $request, int $id): Response
    {

      //  dd($request->headers);

        //1. deseriaze request body
        //dd($request->getContent());

        //2. dows the promotion apply?#
        //3. get the lowest price 
        //4. return the response

        
        if($request->headers->has('force_fail')){
            //dd($request->headers);

            return new JsonResponse([
                'error' => 'Forced error',
                $request->headers->get('force_fail')
            ], 500);
        }
           
        return new JsonResponse([
            'product_id' => $id,
            'quantity' => 99.99,
            'currency' => 'EUR',
            'price' => '€',
            'request_date' => '2021-01-01 00:00:00',
            'voucher_code' => 'ABC123',
            'request_location' => 'Madrid'
        ], 200);
    }
}
