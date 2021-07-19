<?php


namespace App\Email\Classes;


class Config {

	const SITE_URL = 'https://localhost/';
	const SITE_PASTA = "api_vendas_php/app";
	const SITE_NOME = "APP VENDAS ";
	const SITE_EMAIL_ADM = "email@adm.com";

	//INFORMAÇÕES PARA PHP MAILLER
	const EMAIL_HOST = "smtp.gmail.com";
	const EMAIL_USER = " ";
	const EMAIL_NOME = " ";
	const EMAIL_SENHA = " ";
	const EMAIL_PORTA = 587;
	const EMAIL_SMTPAUTH = true;
	const EMAIL_SMTPSECURE = "tls";
	const EMAIL_COPIA = "emailparaenviocopia";



}



