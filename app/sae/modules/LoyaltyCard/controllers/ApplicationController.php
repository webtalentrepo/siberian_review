<?php

class LoyaltyCard_ApplicationController extends Application_Controller_Default
{

    public function editpostAction()
    {

        if ($datas = $this->getRequest()->getPost()) {

            try {

                $html = '';

                // Test s'il y a une erreur dans la saisie
                if (empty($datas['name']) OR empty($datas['number_of_points']) OR empty($datas['advantage']) OR empty($datas['conditions'])) {
                    throw new Exception($this->_('An error occurred while saving your loyalty card. Please fill all fields in.'));
                }

                // Test s'il y a un value_id
                if (empty($datas['value_id'])) throw new Exception($this->_('An error occurred while saving your loyalty card.'));

                // Récupère l'option_value en cours
                $option_value = new Application_Model_Option_Value();
                $option_value->find($datas['value_id']);
                $application = $this->getApplication();
                $card = new LoyaltyCard_Model_LoyaltyCard();

                $card->setData($datas)
                    ->setValueId($option_value->getId())
                    ->save();

                $html = array(
                    'success' => '1',
                    'success_message' => $this->_('Your loyalty card has been saved successfully'),
                    'message_timeout' => 2,
                    'message_button' => 0,
                    'message_loader' => 0
                );

            } catch (Exception $e) {
                $html = array(
                    'message' => $e->getMessage(),
                    'message_button' => 1,
                    'message_loader' => 1
                );
            }

            $this->getLayout()->setHtml(Zend_Json::encode($html));
        }

    }

    public function savepasswordAction()
    {

        if ($datas = $this->getRequest()->getPost()) {

            $html = '';

            try {

                $isNew = true;

                $password = new LoyaltyCard_Model_Password();
                $application = $this->getApplication();
                $password_id = $datas['password_id'];

                if (!empty($datas['password_id'])) {
                    $password->find($datas['password_id']);
                    if ($password->getAppId() != $application->getId()) {
                        throw new Exception($this->_("An error occurred while saving the password. Please try again later"));
                    }
                    $isNew = false;
                } else {
                    $datas['app_id'] = $application->getId();
                }

                if (empty($datas['is_deleted'])) {
                    if (empty($datas['name'])) throw new Exception($this->_('Please enter a name'));

                    if (empty($datas['password'])/* OR empty($datas['confirm_password'])*/) {
                        throw new Exception($this->_('Please enter a password'));
                    }
                    if (strlen($datas['password']) < 4 OR !ctype_digit($datas['password'])/* OR empty($datas['confirm_password'])*/) {
                        throw new Exception($this->_('Your password must be 4 digits'));
                    }

                    $password->setPassword(sha1($datas['password']));
                    if ($datas['password']) unset($datas['password']);
                } else if (!$password->getId()) {
                    throw new Exception($this->_('An error occurred while saving the password. Please try again later.'));
                }
                $password->addData($datas)
                    ->save();

                $html = array('success' => 1, 'id' => $password->getId());
                if (!empty($datas['is_deleted'])) {
                    $html['is_deleted'] = 1;
                    $html['id'] = $password_id;
                } else if ($isNew) {
                    $html['is_new'] = 1;
                    $html['name'] = $password->getName();
                }
//                }
//                else {
//                    $employee->delete();
//                    $html = array();
//                }
            } catch (Exception $e) {
                $html = array('message' => $e->getMessage());
            }

            $this->getLayout()->setHtml(Zend_Json::encode($html));

        }
    }

    public function dlqrcodeAction()
    {

        if ($data = $this->getRequest()->getParams()) {

            $html = '';

            try {

                $password = new LoyaltyCard_Model_Password();
                $application = $this->getApplication();
                $password_id = $data['password_id'];

                $password->find($data['password_id']);
                if ($password->getAppId() != $application->getId()) {
                    throw new Exception($this->_("An error occurred while retrieving QRCode. Please try again later"));
                }

                if(!$password->getUnlockCode()) {
                    $unlock_code = uniqid();
                    $data["unlock_code"] = $unlock_code;
                    $password->addData($data)
                        ->save();
                } else {
                    $unlock_code = $password->getUnlockCode();
                }

                $dir_image = Core_Model_Directory::getBasePathTo("/images/application/".$this->getApplication()->getId());

                if(!is_dir($dir_image)) mkdir($dir_image, 0775, true);
                if(!is_dir($dir_image."/application")) mkdir($dir_image."/application", 0775, true);
                if(!is_dir($dir_image."/application/qrloyalty")) mkdir($dir_image."/application/qrloyalty", 0775, true);

                $dir_image .= "/application/qrloyalty/";
                $image_name = $password->getId()."-qrloyalty.png";

                if(!is_file($dir_image.$image_name)) {
                    copy('http://api.qrserver.com/v1/create-qr-code/?color=000000&bgcolor=FFFFFF&data=sendback%3A'.$unlock_code.'&qzone=1&margin=0&size=200x200&ecc=L', $dir_image.$image_name);
                }

                $img = imagecreatefrompng($dir_image.$image_name);
                $readable_name = $password->getName();
                header('Content-Type: image/png');
                header('Content-Disposition: attachment; filename="'.$readable_name.'"');
                imagepng($img);
                imagedestroy($img);
                die();

            } catch (Exception $e) {
                $html = $e->getMessage();
            }

            echo $html;

        }
    }

}