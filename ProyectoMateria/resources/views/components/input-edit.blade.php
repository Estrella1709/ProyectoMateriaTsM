<div class="form-group">
    <input type="text" class="custom-input" placeholder="{{ $placeholder }}" name="{{$nombre}}" value="{{$valor}}">
    <small class="text-danger fst-italic"> {{$errors->first($nombre)}}</small>
</div>
