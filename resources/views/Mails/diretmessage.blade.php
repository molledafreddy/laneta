@extends('Mails.layouts.app')

@section('content')
<div class="row">
	<span>
		Hola 
	</span>
	<table class="subcopy" width="100%" cellpadding="0" cellspacing="0">
	    <tr>
	        <td>
	            <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0">
				    <tr>
				        <td align="center">
	            			Recibio un mensaje de: {{$first_name}} {{$last_name}}
				        </td>
				    </tr>
				</table>
	        </td>
	    </tr>
	    <tr>
	    	<td>
	    		<table style="margin: 30px auto; padding: 0; text-align: center; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;"  align="center" width="100%" cellpadding="0" cellspacing="0">
				    <tr>
				        <td align="center">
				            <table width="100%" border="0" cellpadding="0" cellspacing="0">
				                <tr>
				                    <td align="center">
				                        <table border="0" cellpadding="0" cellspacing="0">
				                            <tr>
				                                <td>
				                                	<a class="button button-blue" href="{{route('portal.index')}}">Ingresa ya</a>
				                                </td>
				                            </tr>
				                        </table>
				                    </td>
				                </tr>
				            </table>
				        </td>
				    </tr>
				</table>
	    	</td>
	    </tr>
	</table>
</div>
@endsection