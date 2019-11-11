@extends('admin::back.layouts.app')

@php
    $title = ($item['id']) ? 'Просмотр share' : 'Создание share';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.shares-package.shares::back.partials.breadcrumbs.form')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title">
                <a class="btn btn-sm btn-white" href="{{ route('back.shares-package.shares.index') }}">
                    <i class="fa fa-arrow-left"></i> Вернуться назад
                </a>
            </div>
        </div>

        {!! Form::info() !!}

        {!! Form::open(['url' => (! $item['id']) ? route('back.shares-package.shares.store') : route('back.shares-package.shares.update', [$item['id']]), 'id' => 'mainForm', 'enctype' => 'multipart/form-data']) !!}

        @if ($item->id)
            {{ method_field('PUT') }}
        @endif

        {!! Form::hidden('share_id', (! $item['id']) ? '' : $item['id'], ['id' => 'object-id']) !!}

        {!! Form::hidden('share_type', get_class($item), ['id' => 'object-type']) !!}

        <div class="ibox">
            <div class="ibox-title">
                {!! Form::buttons('', '', ['back' => 'back.shares-package.shares.index']) !!}
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group float-e-margins" id="mainAccordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#mainAccordion" href="#collapseMain"
                                           aria-expanded="true">Основная информация</a>
                                    </h5>
                                </div>
                                <div id="collapseMain" class="collapse show" aria-expanded="true">
                                    <div class="panel-body">

                                        {!! Form::user('', $item) !!}

                                        {!! Form::string('href', $item['href'], [
                                            'label' => [
                                                'title' => 'Ссылка',
                                            ],
                                            'field' => [
                                                'disabled' => true,
                                            ],
                                        ]) !!}

                                        @if ($item['share_user'])
                                            <div class="form-group row">
                                                <label for="message" class="col-sm-2 col-form-label font-bold">Дополнительная информация</label>

                                                <div class="col-sm-10">
                                                    <pre class="json-data">@json($item['share_user']['additional_info'])</pre>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                        @endif

                                        {!! Form::hidden('is_checked', 0) !!}
                                        {!! Form::checks('is_checked', $item['is_checked'], [
                                            'label' => [
                                                'title' => 'Проверено',
                                            ],
                                            'checks' => [
                                                [
                                                    'value' => 1,
                                                ],
                                            ],
                                        ]) !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                {!! Form::buttons('', '', ['back' => 'back.shares-package.shares.index']) !!}
            </div>
        </div>

        {!! Form::close()!!}
    </div>
@endsection
