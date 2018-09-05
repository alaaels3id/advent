@extends('layouts.app') 

@section('title', __('cozastore.faqs'))

@section('content')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ $root }}/advent/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">{{ __('cozastore.faqs') }}</h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container" dir="{{ condition('rtl', 'ltr') }}">

        @include('admin.layout.message')
        
        <div class="row">
            <div class="col-md-8">
                <div class="accordion" id="accordionExample">

                    @foreach(DB::table('faqs')->select('type')->distinct()->get() as $type)
                    
                        <div class="h3" style="background-color: #b8bff0; padding: 10px; color: #000; border-radius: 15px;">
                            {{ FaqsTyps()[$type->type] }}
                        </div>
                                
                        @foreach(DB::table('faqs')->where('type', $type->type)->get() as $faq)
                    
                            <div class="card">
                                <div class="card-header" id="heading{{ $faq->id }}">
                                    <h5 class="mb-0">
                                        <button 
                                        class="btn btn-link pull-{{ condition('right', 'left') }}"
                                        type="button" data-toggle="collapse" 
                                        data-target="#collapse{{ $faq->id }}" 
                                        aria-expanded="true" 
                                        aria-controls="collapse{{ $faq->id }}">
                                             <h4>{{ text($faq->head, isAuthOrNot()) }}</h4>
                                        </button>
                                    </h5>
                                </div>
                        
                                <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordionExample">
                                    <div class="card-body pull-{{ condition('right', 'left') }}"">
                                        <h4>{{ text($faq->body, isAuthOrNot()) }}</h4>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                        <br>
                    @endforeach

                </div>
            </div>

            <div class="col-md-4" dir="rtl">
                <div class="card">
                    <div class="card-header">نصائح قد تهمك في الحياة</div>
                    <div class="card-body pull-right">
                        هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء
                        هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراءهذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء
                        هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراءهذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء
                        هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراءهذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء
                        <hr>
                        هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء
                        هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراءهذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء
                        هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراءهذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء
                        هذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراءهذه بعض التعليمات التي من الممكن ان تفيك في عملية الشراء
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop