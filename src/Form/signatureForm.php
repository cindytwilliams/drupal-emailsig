<?php

namespace Drupal\vscc_email_signature\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements an ldap form.
 */
class signatureForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'signature_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

        
    // when form is submitted, display results in a Twig template
    $values = $form_state->getValues();
    if (!empty($values)) {
      $form['result'] = [
        '#theme' => 'vscc_signature_page',
        '#results' => $values
      ];  
    }
    
    else {
      
      // display the form
      
      $form['text']['#markup'] = t("<p>Faculty and staff are encouraged to use the official Vol State email signature in all correspondence. Using a consistent, branded email signature across campus helps strengthen the college's visual identity.</p><p>Create your signature using the form below (<b>works best using Google Chrome web browser</b>).</p>");
      
      $form['sig_name'] = array(
        '#type' => 'textfield',
        '#title' => t('Name'),
        '#required' => TRUE,
      );
      
      $form['sig_title'] = array(
        '#type' => 'textfield',
        '#title' => t('Job Title'),
        '#required' => TRUE,
      );
      
      $form['sig_dept'] = array(
        '#type' => 'textfield',
        '#title' => t('Department'),
        '#required' => TRUE,
      );
      
      $form['sig_email'] = array(
        '#type' => 'email',
        '#title' => t('Email'),
        '#required' => TRUE,
      );
      
      $form['sig_campus'] = array(
        '#title' => t('Campus'),
        '#type' => 'select',
        '#options' => [
          'Main Campus' => $this->t('Main Campus'),
          'Cookeville' => $this->t('Cookeville'),
          'Highland Crest' => $this->t('Highland Crest'),
          'Livingston' => $this->t('Livingston'),
          'Upper Cumberland' => $this->t('Upper Cumberland'),
        ],
      ); 
      
      $form['sig_phone'] = array(
        '#type' => 'textfield',
        '#title' => t('Phone Number'),
        '#default_value' => t("(615) 230-####"),
        '#required' => TRUE,
      ); 
      
      $form['sig_fax'] = array(
        '#type' => 'textfield',
        '#title' => t('Fax Number'),
        '#required' => FALSE,
      ); 
      
      $form['sig_facebook'] = array(
        '#type' => 'textfield',
        '#title' => t('Facebook'),
        '#default_value' => t("https://www.facebook.com/volstate"),
        '#required' => FALSE,
      );  
      
      $form['sig_twitter'] = array(
        '#type' => 'textfield',
        '#title' => t('Twitter'),
        '#default_value' => t("https://twitter.com/volstatecampus"),
        '#required' => FALSE,
      );  
      
      $form['sig_instagram'] = array(
        '#type' => 'textfield',
        '#title' => t('Instagram'),
        '#default_value' => t("http://instagram.com/volstatecampus"),
        '#required' => FALSE,
      ); 
      
      $form['sig_youtube'] = array(
        '#type' => 'textfield',
        '#title' => t('YouTube'),
        '#default_value' => t("https://www.youtube.com/user/volstate1"),
        '#required' => FALSE,
      );    
      
      $form['actions']['#type'] = 'actions';
      $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('Create Signature'),
        '#button_type' => 'primary',
      );

    }
    
    return $form;
    
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
    $form_state->setRebuild();
    
  }
  
}   // end class