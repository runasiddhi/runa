<?php
class books extends NonSessionController{

	public function index(){
		if(!$_POST){
			return $this->load->view('book_form');
		}

		$data=array(
			'book_name'=>$_POST['book_name'],
			'author'=>$_POST['author']
			);
		try{
			$book=Book::create($data);			
		}
		catch(BlankBookException $e){
			$data['message'] = $e->getMessage();

			return $this->load->view('book_form',$data);
		}
		catch(BlankAuthorException $e){
			$data['message'] = $e->getMessage();

			return $this->load->view('book_form',$data);
		}
		

		return $this->load->view('success');
	}
}