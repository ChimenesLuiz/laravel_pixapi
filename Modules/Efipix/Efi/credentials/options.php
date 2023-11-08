<?php
/**
 * Environment
 */
$sandbox = false; // false = Production | true = Homologation

/**
 * Credentials of Production
 */
$clientIdProd = "Client_Id_d09e99bcbb8b4fdb3519457676628e883f1f1a37";
$clientSecretProd = "Client_Secret_3aa5e464db499fe3b2827de0e9af77e122ba9340";
$pathCertificateProd = realpath(__DIR__."/productionCertificate.pem"); // Absolute path to the certificate in .pem or .p12 format
/**
 * Credentials of Homologation
 */
// $clientIdHomolog = "Client_Id_c16729081c01e2ec27aa2580ae8de7440a5dbb25";
// $clientSecretHomolog = "Client_Secret_e3f1d927cfd9c16c2a3b5dea66edeb5503db75b3";
// $pathCertificateHomolog = realpath("developmentCertificate.pem"); // Absolute path to the certificate in .pem or .p12 format

/**
 * Array with credentials for sending requests
 */
$options = [
	"clientId" => ($sandbox) ? $clientIdHomolog : $clientIdProd,
	"clientSecret" => ($sandbox) ? $clientSecretHomolog : $clientSecretProd,
	"certificate" => ($sandbox) ? $pathCertificateHomolog : $pathCertificateProd,
	"pwdCertificate" => "", // Optional | Default = ""
	"sandbox" => false, // Optional || Default = false
	"debug" => false, // Optional
	"timeout" => 30// Optional

];
