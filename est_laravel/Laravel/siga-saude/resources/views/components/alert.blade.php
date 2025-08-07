{{--
    Este arquivo define o HTML do nosso componente.
    As variáveis $type e $baseClass foram passadas automaticamente
    pela classe App\View\Components\Alert.php.
--}}

{{-- Usamos a diretiva @class do Blade, que é perfeita para isso.
     Ela adiciona a classe 'alert' sempre, e as outras classes
     apenas se a condição for verdadeira.
--}}
<div @class([
    $baseClass,
    'alert-success' => $type === 'sucesso',
    'alert-danger'  => $type === 'erro',
    'alert-warning' => $type === 'aviso',
    'alert-info'    => $type === 'info',
]) role="alert">

    {{-- A variável $slot é especial e reservada.
         Ela contém tudo o que for escrito ENTRE as tags
         <x-alert> e </x-alert>.
    --}}
    {{ $slot }}

</div>

{{-- Para que isso funcione visualmente, você precisaria ter classes CSS
     como .alert, .alert-success, etc., definidas no seu CSS,
     semelhante ao que frameworks como Bootstrap oferecem.
--}}