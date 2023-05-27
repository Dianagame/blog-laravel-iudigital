@csrf
<label for="title">Titulo</label>
<input class="form-control" type="text" name="title" id="title" value="{{old('title',$post->title)}}">

<label for="slug">Slug</label>
<input class="form-control" type="text" name="slug" id="slug" value="{{old('slug',$post->slug)}}">

<label for="category:id">Categorias</label>
    <select class="form-control" name="category_id" id="category_id">
    <option value="">Seleccione una categoria</option>
    @foreach ($categories as $title =>$id)
        <option {{old('category_id', "post->category_id") == $id ? 'selected' : ''}} value="{{$id}}">{{title}}</option>
        
    @endforeach
</select>

<label for="posted">Estado</label>
<select name="posted" id="posted">
    <option {{old('posted',$post->posted) == 'not' ? 'selected' :''}} value="not">No publicado</option>
    <option {{old('posted',$post->posted) == 'yes' ? 'selected' :''}} value="yes">Publicado</option>
</select>

<label for="content">Contenido</label>
<textarea class="form-control" name="content" id="content" cols="30" rows="10">{{old('content',$post->content)}}</textarea>
<label for="">Descripcion</label>
<input class="btn btn-primary" type="submit" value="Guardar">
