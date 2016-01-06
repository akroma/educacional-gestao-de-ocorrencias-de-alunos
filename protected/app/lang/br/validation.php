<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| O following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "O :attribute precisa ser aceito.",
	"active_url"           => "O :attribute não é uma URL valida.",
	"after"                => "O :attribute precisa ser uma data depois de :date.",
	"alpha"                => "O :attribute deve conter somente letras.",
	"alpha_dash"           => "O :attribute deve conter somente letras, numero, e underline(_).",
	"alpha_num"            => "O :attribute deve conter somente letras e numero.",
	"array"                => "O :attribute precisa ser uma array.",
	"before"               => "O :attribute precisa ser uma data antes de :date.",
	"between"              => array(
		"numeric" => "O :attribute precisa estar entre :min e :max.",
		"file"    => "O :attribute precisa estar entre :min e :max kilobytes.",
		"string"  => "O :attribute precisa estar entre :min e :max caracteres.",
		"array"   => "O :attribute precisa estar entre :min e :max items.",
	),
	"boolean"              => "O :attribute campo precisa ser true or false.",
	"confirmed"            => "O :attribute confirmation does não match.",
	"date"                 => "O :attribute não é uma valida date.",
	"date_format"          => "O :attribute does não match the format :format.",
	"different"            => "O :attribute e :other precisa ser different.",
	"digits"               => "O :attribute precisa ser :digits digits.",
	"digits_between"       => "O :attribute precisa estar entre :min e :max digits.",
	"email"                => "O :attribute precisa ser uma valida email address.",
	"exists"               => "O selected :attribute é invalid.",
	"image"                => "O :attribute precisa ser uma imagem.",
	"in"                   => "O selected :attribute é invalid.",
	"integer"              => "O :attribute precisa ser um número.",
	"ip"                   => "O :attribute precisa ser uma valida IP address.",
	"max"                  => array(
		"numeric" => "O :attribute deve não ser maior que :max.",
		"file"    => "O :attribute deve não ser maior que :max kilobytes.",
		"string"  => "O :attribute deve não ser maior que :max caracteres.",
		"array"   => "O :attribute deve não have more que :max items.",
	),
	"mimes"                => "O :attribute precisa ser a file of type: :values.",
	"min"                  => array(
		"numeric" => "O :attribute precisa ter no minimo :min caracteres.",
		"file"    => "O :attribute precisa ser at least :min kilobytes.",
		"string"  => "O campo :attribute precisa ter no minimo :min caracteres.",
		"array"   => "O :attribute precisa have at least :min items.",
	),
	"not_in"               => "O selected :attribute é invalid.",
	"numeric"              => "O campo :attribute é numérica.",
	"regex"                => "O :attribute format é invalid.",
	"required"             => "O  campo \":attribute\" é obrigatório.",
	"required_if"          => "O :attribute campo é required when :other é :value.",
	"required_with"        => "O :attribute campo é required when :values é present.",
	"required_with_all"    => "O :attribute campo é required when :values é present.",
	"required_without"     => "O :attribute campo é required when :values é não present.",
	"required_without_all" => "O :attribute campo é required when none of :values are present.",
	"same"                 => "O :attribute e :other precisa match.",
	"size"                 => array(
		"numeric" => "O :attribute precisa ter :size.",
		"file"    => "O :attribute precisa ter :size kilobytes.",
		"string"  => "O :attribute precisa ter :size caracteres.",
		"array"   => "O :attribute precisa contain :size items.",
	),
	"unique"               => "A :attribute já está cadastrado.",
	"url"                  => "O :attribute format é invalid.",
	"timezone"             => "O :attribute precisa ser uma valida zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you deve specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. Thé makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| O following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". Thé simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
