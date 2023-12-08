@extends('layouts.main')
@push ('title')
<title>UploadCsv</title>
@endpush 
@section('main-section')
    <div class="maincontainer">
        @include('layouts.left')
            <div class="right">	
                <h2>Upload image</h2>		 
                    <div class="add">
                        <div class="addpage">Upload Image</div> 
                            <form method="post" enctype="multipart/form-data" action="{{ route('upload.data') }}">
                            @csrf
                            <!-- table starts -->
                            <input type="hidden" name="edited" />
                                <table class="table3" border ="1px solid" >												
                                    <tr>						 
                                        <td>Upload Image</td>
                                        <td><input type="file" name="file"/></td>
                                    </tr>												 				
                                </table>
                                <input type="submit" value="Upload" class="save" name="save"/>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div  >
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </form>
                        </div> 
                        <!-- div ends here -->
                    </div>    
            </div>
            <!-- div ends here -->
    </div>  
    <!-- div ends here -->
@endsection