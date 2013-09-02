 <?php
class Signup extends NonSessionController{
   
    public function index(){
        if(!$_POST){
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            return $this->load->view('signup',array('organization'=>$organizations));
        }

        $inputs=array(
                'first_name'=>$this->input->post('fname'),
                'last_name'=>$this->input->post('lname'),
                'email'=>$this->input->post('email'),
                'contact_number'=>$this->input->post('contactno'),
                'sex'=>$this->input->post('sex'),
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'),
                'confirm_password'=>$this->input->post('confirm_password'),
                'organization'=>Organization::find_by_id($this->input->post('organization'))
            );

        try{
                
            $member = Member::create($inputs);

            $user = User::create($inputs);             

            $user->member = $member;
            $user->save();

            $member->save();

        } 
        catch(FirstNameBlankException $e) {
            $message= $e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        } 
        catch(LastNameBlankException $e){
            $message= $e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(EmailBlankException $e){
            $message= $e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(ContactNumberBlankException $e){
            $message= $e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(SexBlankException $e){
            $message= $e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(UsernameBlankException $e){
            $message= $e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(PasswordBlankException $e){
            $message= $e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(UserExistsException $e){
            $message= $e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(PasswordMismatchException $e){
            $message=$e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(InactiveException $e){
            $message=$e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }
        catch(DeletedException $e){
            $message=$e->getMessage();
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            $this->load->view('signup',array('organization'=>$organizations,'message'=>$message));
        }

        redirect('login/index');
    }
}

