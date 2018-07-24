@extends('layouts.asu-web-standards')

@section('content')
    <div class="column">
        <div class="region region-content">
            <div class="block block-system">
                <div class="content">
                    <div class="panel-display clearfix">
                        <section class="hero-slim theme-color-background">
                            <div class="container">
                                <div class="row">
                                    <div class="fdt-home-container fdt-home-column-content clearfix panel-panel row-fluid container">
                                        <div class="fdt-home-column-content-region fdt-home-row panel-panel span12">
                                            <div class="panel-pane pane-fieldable-panels-pane pane-fpid-12 pane-bundle-text">
                                                <h1 class="pane-title">Projects</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="widecolumn">
        <div class="asu-breadcrumbs"><div class="container"><div class="row"><div class="col-md-12">
            <div id="breadcrumbs" class="breadcrumb">
                <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <span itemprop="title">
                        <!-- TODO: Breadcrumbs -->
                    </span>
                </span>
            </div>
        </div></div></div></div>
    </div>

    <div class="container pad-bot-md pad-top-sm">

        <div class="content">
           @include('adminlte-templates::common.errors')
           <div class="box box-primary">
               <div class="box-body">
                   <div class="row">
                       {!! Form::model($opportunity, ['route' => ['projects.update', $opportunity->id], 'method' => 'patch']) !!}

                            @include('projects.fields')

                       {!! Form::close() !!}
                   </div>
               </div>
           </div>
       </div>
    </div>
@endsection
