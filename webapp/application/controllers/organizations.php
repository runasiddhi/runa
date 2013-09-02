<?php
class Organizations extends NonSessionController{

	public function index(){		
		try{
			if(!$_POST) {

				return $this->load->view('organization_form');
			}
			$inputs=array(
				'name'=>$_POST['name'],
				'address'=>$_POST['address'],
				'contact_number'=>$_POST['contact_number'],
				'email'=>$_POST['email']
			);

			$org= Organization::create($inputs);
		}
		catch(NameBlankException $e){
			$message['message'] = $e->getMessage();
            $this->load->view('organization_form', $message);
		}
		catch(OrgEmailBlankException $e){
			$message['message'] = $e->getMessage();
            $this->load->view('organization_form', $message);
		}
		catch(OrgContactNumberBlankException $e){
			$message['message'] = $e->getMessage();
            $this->load->view('organization_form', $message);
		}
		catch(AddressBlankException $e){
			$message['message'] = $e->getMessage();
            $this->load->view('organization_form', $message);
		}

		return $this->load->view('success');
	}

	public function view_organization(){
		$organizations=Organization::find('all');

		return $this->load->view('view_organization',array('organizations'=>$organizations));
	}

	public function activate_org($org_id){
		$organization=Organization::find_by_id($org_id);

		$organization->activate();

		redirect('organizations/view_organization');
	}

	public function deactivate_org($org_id){
		$organization=Organization::find_by_id($org_id);

		$organization->deactivate();

		redirect('organizations/view_organization');
	}
}