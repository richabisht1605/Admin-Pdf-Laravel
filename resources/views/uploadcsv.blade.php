@extends('layouts.main')

@push ('title')
<title>UploadCsv</title>
@endpush 

@section('main-section')
<div class="maincontainer">
@include('layouts.left')
    <div class="right">	

        <h2>Upload Csv</h2>
        
        <!--div starts here--->			    					 
            <div class="add">
                <div class="addpage">Upload Csv</div> 
                    <form method="">
                        {{csrf_field()}}
                    <!-- table starts -->
                    <input type="hidden" name="edited" />
                        <table class="table3" border ="1px solid" >												
                            <tr>						 
                                <td>Upload Csv
                                </td>
                                <td>
                                    <input type="file" name="file"/>
                                </td>
                            <tr>
                           					 
                                <td> </td>
                                <td>
                                    
                                    <input type="checkbox" name=""/>Sku<br><br>
                                    <input type="checkbox" name=""/>Quantity<br><br>
                                    <input type="checkbox" name=""/>Order ID<br><br>
                                    <input type="checkbox" name=""/>Order Notes<br>
                                    <input type="checkbox" name=""/>Invoice Number <br>
                                   

                                </td>
                            </tr>								 
                           
                            													 				
                        </table>
                        
                    <!-- table3 ends -->
                    
                <input type="submit" value="Pdf" class="save" name="save"/>
                <input type="submit" value="image" class="save" name="save"/>
              
                </form>
            </div>
            <!-- div ends here -->
        </div>
    <!--right div ends--->
    </div>
    <!----middlecontainer ends -->
@endsection