<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>{{ static_text('title') }} &raquo; Ghost</title>
		{{ ghost_header() }}
	</head>

	<body>