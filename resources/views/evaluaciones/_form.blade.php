
<div class="form-group row">
<div class="col-md-6">
    <label for="title">Rut evaluador 1</label>
        <input class="form-control border-0 bg-light shadow-sm"
            type="text" name="rut_evaluador1" value="{{ old('rut_evaluador1', $evaluacion->rut_evaluador1) }}"> 
</div>
<div class="col-md-6">      
    <label for="title">Rut evaluador 2</label>
        <input class="form-control border-0 bg-light shadow-sm"
            type="text" name="rut_evaluador2" value="{{ old('rut_evaluador2', $evaluacion->rut_evaluador2) }}">       
</div>
</div>
 
<div class="form-group">
    <div class="row">  
        <div class="col-md-4">
            Actividades 
            <input class="form-control border-1 bg-white"
                type="text" placeholder="Actividades de Docencia" readonly="readonly">       
            <input class="form-control border-1 bg-white"
                type="text" placeholder="Actividades de Investigacion" readonly="readonly">
            <input class="form-control border-1 bg-white"
                type="text" placeholder="Actividades de Extension y vinculación" readonly="readonly">
            <input class="form-control border-1 bg-white"
                type="text" placeholder="Actividades de Administracion académica" readonly="readonly">
            <input class="form-control border-1 bg-white"
                type="text" placeholder="Otras actividades" readonly="readonly">
        </div>
        <div class="col-md-4">
            % Tiempo asignado
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="docencia_tiempo" value="{{ old('docencia_tiempo', $evaluacion->docencia_tiempo) }}">       
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="investigacion_tiempo" value="{{ old('investigacion_tiempo', $evaluacion->investigacion_tiempo) }}">                   
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="extension_tiempo" value="{{ old('extension_tiempo', $evaluacion->extension_tiempo) }}">           
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="administracion_tiempo" value="{{ old('administracion_tiempo', $evaluacion->administracion_tiempo) }}">           
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="otras_tiempo" value="{{ old('otras_tiempo', $evaluacion->otras_tiempo) }}">  
        </div>
        <div class="col-md-4">
            Nota
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="docencia_nota" value="{{ old('docencia_nota', $evaluacion->docencia_nota) }}">       
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="investigacion_nota" value="{{ old('investigacion_nota', $evaluacion->investigacion_nota) }}">       
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="extension_nota" value="{{ old('extension_nota', $evaluacion->extension_nota) }}">       
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="administracion_nota" value="{{ old('administracion_nota', $evaluacion->administracion_nota) }}">       
            <input class="form-control border-1 bg-light shadow-sm"
                type="text" placeholder="" name="otras_nota" value="{{ old('otras_nota', $evaluacion->otras_nota) }}">       
        </div>
    </div>
</div>

<div class="form-group row">
<div class="col-md-6">
    <label for="title">Calificacion Final</label>
        <input class="form-control border-0 bg-light shadow-sm"
            type="text" placeholder="Rango nota 1.0 a 7.0" name="calificacion_final" value="{{ old('calificacion_final', $evaluacion->calificacion_final) }}">       
</div>
<div class="col-md-6"> 
    <label for="title">Observaciones</label>
        <input class="form-control border-0 bg-light shadow-sm"
            type="text" name="observacion_final" value="{{ old('observacion_final', $evaluacion->observacion_final) }}">       
</div>
</div>


<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="javascript:window.history.back();">Cancelar</a>