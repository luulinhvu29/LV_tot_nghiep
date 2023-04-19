@extends('front.layout.master')

@section('title', 'FAQ')

@section('body')
    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home </a>
                        <span>FAQs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- faq section-->
    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading active">
                                    <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                        Is There Anything I Should Bring?
                                    </a>
                                </div>
                                <div class="collapse show" id="collapseOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>hfvefhjvdhajvfjavjhfvadsjfvhja
                                            uagfuiagfyaufgaulgfaglfa
                                            hvuzsdvzbvdsh</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">
                                        Where Can I Find Market Research Reports?
                                    </a>
                                </div>
                                <div class="collapse" id="collapseTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>vefhjgsjhfvadsjfvhja
                                            faglfa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">
                                        Where Can I Find The Wall Street Journal?
                                    </a>
                                </div>
                                <div class="collapse" id="collapseThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>YEAHHHHHHHHHHHHHHH
                                            !!!!!!!!!!!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
