@extends('layouts.app')
@include('layouts.nav')
@section('content')
    <header>
        <div class="page-title">
            <div class="container">
                <h1>Profile</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="container"> 
        	<div style="height: 130px;background: #f4f4f5;position: relative;border:solid 1px #ddd;border-bottom: 0;display: flex;align-items: center;">
        		<div style="position: absolute;width: 220px;height: 220px;left: 35px;bottom: -130px;background: #333;border:solid 6px #fff;">
        			
        		</div>
        		<h1 style="padding-left: 280px;">My Name</h1>
        		 
        	</div>
        	<div style="height:450px;background-color: #fff;border:solid 1px #ddd;padding-left: 280px;">
        			<table >
        				<tr>
        					<td>First Name</td>
        					<td>&nbsp; : &nbsp;</td>
        					<td></td>
        				</tr>
        				<tr>
        					<td>Last Name</td>
        					<td>&nbsp; : &nbsp;</td>
        					<td></td>
        				</tr>
        				<tr>
        					<td>Gender</td>
        					<td>&nbsp; : &nbsp;</td>
        					<td></td>
        				</tr>
        				<tr>
        					<td>Age</td>
        					<td>&nbsp; : &nbsp;</td>
        					<td></td>
        				</tr>
        				<tr>
        					<td>Marital status</td>
        					<td>&nbsp; : &nbsp;</td>
        					<td></td>
        				</tr> 
        			</table>
        	</div>
        </div>
    </main>

 
    @include('dashboard.add-user-modal')
@endsection