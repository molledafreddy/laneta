
@extends('Mails.layouts.app')

@section('content')
<div class="row">
	<table class="subcopy" width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<p class="p capitalize">
					Hola {{$first_name}} {{$last_name}}
				</p>
			</td>
		</tr>
	    <tr>
	        <td>
	            <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0">
				    <tr>
				        <td align="center">
	            			Su comentario se ha realizado de manera exitosa.
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
				                                	<a class="button button-blue" href="{{url('/')}}">click para ingresar</a>
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