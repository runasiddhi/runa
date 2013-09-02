<?php

class OrderBook extends NonSessionController{
	
	public function index(){
		if(!$_POST){
			$organizations = Organization::find('all', array('select' => 'id, name'));
	        $books=Book::find('all',array('select'=>'id, book_name'));

	        return $this->load->view('orderbook_form',array('organizations'=>$organizations,'books'=>$books));
		}
		$data=array(
			'organization'=>Organization::find_by_id($_POST['org_id']),
			'book'=>Book::find_by_id($_POST['book_id']),
			'quantity'=>$_POST['quantity']
			);

		try{
			
			$org_book=Organization_book::create($data);

			if($org_book){
				return $this->load->view('success');
			}
		}
		catch(QuantityBlankException $e){
			$data['message'] = $e->getMessage();
			$data['organizations'] = Organization::find('all', array('select' => 'id, name'));
        	$data['books']=Book::find('all',array('select'=>'id, book_name'));

            $this->load->view('orderbook_form', $data);
		}
		catch(InvalidQuantityException $e){
			$data['message'] = $e->getMessage();
			$data['organizations'] = Organization::find('all', array('select' => 'id, name'));
        	$data['books']=Book::find('all',array('select'=>'id, book_name'));

            $this->load->view('orderbook_form', $data);
		}
		catch(InactiveException $e){
			$data['message'] = $e->getMessage();
			$data['organizations'] = Organization::find('all', array('select' => 'id, name'));
        	$data['books']=Book::find('all',array('select'=>'id, book_name'));

            $this->load->view('orderbook_form', $data);
		}
		catch(DeletedException $e){
			$data['message'] = $e->getMessage();
			$data['organizations'] = Organization::find('all', array('select' => 'id, name'));
        	$data['books']=Book::find('all',array('select'=>'id, book_name'));

            $this->load->view('orderbook_form', $data);
		}
	}

	
}