<li class="{{ Request::is('roteiros*') ? 'active' : '' }}">
    <a href="{!! route('roteiros.index') !!}"><i class="fa fa-edit"></i><span>Roteiros</span></a>
    @isset($roteiros)
    
    @endisset
</li>

