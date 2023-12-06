@extends('layouts.main')

@push ('title')
<title></title>
@endpush 

@section('main-section')
<div class="maincontainer">
@include('layouts.left')
    <div class="right">	

        <h2>Page Manager</h2>
        
        <!--div starts here--->			    					 
            <div class="add">
                <div class="addpage"> Add page</div> 
                    <form method="post" action="{{url(isset($findrec) ? 'edit-data/'.$findrec[0]->id : '/add-page' )}}">
                        {{csrf_field()}}
                    <!-- table starts -->
                    <input type="hidden" name="edited" />
                        <table class="table3" border="1px solid" >												
                            <tr>						 
                                <td>Name*
                                </td>
                                <td>
                                    <input type="text" name="name" value="{{isset($findrec[0]->name)? $findrec[0]->name : '' }}">
                                </td>
                            </tr>									 
                            <tr>
                                <td>Content</td>
                                <td>
                                    <input type="textarea" class="textarea" name="content" value="{{isset($findrec[0]->content)? $findrec[0]->content : '' }}"></td>
                            </tr>													 
                          <tr>
                                <td>Status </td>
                                <td>
                                    <input  type="checkbox" name="status" value="{{isset($findrec[0]->status)? $findrec[0]->status : '' }}" >											
                                </td>
                            </tr>				
                        </table>
                        
                    <!-- table3 ends -->
                    
                <input type="submit" value="save" class="save" name="save"/>
              
                </form>
            </div>
            <!-- div ends here -->
        </div>
    <!--right div ends--->
    </div>
    <!----middlecontainer ends -->
@endsection