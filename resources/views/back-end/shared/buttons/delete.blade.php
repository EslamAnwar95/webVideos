<form action="{{ route($routeName.'.destroy', $user) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" rel="tooltip" title=""
        class="btn btn-white btn-link btn-sm ml-3"
        data-original-title="Remove {{ $sModuleName }}">
        <i class="material-icons">close</i>
    </button>
</form>