<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * returns contact form labels.
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'name'),
            'email' => 'EMAIL',
            'subject' => Yii::t('app', 'subject'),
            'body' => Yii::t('app', 'message'),
        ];
    }


    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo('david.novak@ltcheval.com')
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

//                ->setTo('david.novak@ltcheval.com')
//                ->setFrom('sender@example.com')
//                ->setSubject('Test Email')
//                ->setTextBody('This is a test email.')
//                ->send();

            return true;
        }
        return false;
    }
}
