<input type="hidden" name="id" value="{{isset($registro->id) ? $registro->id : ''}}"/>

<div class="input-field">
	<input type="text" name="nome" class="validade" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
	<label data-error="wrong" data-success="right">Nome</label>
</div>

<div class="input-field">
	<input type="text" name="email" class="validade" value="{{ isset($registro->email) ? $registro->email : '' }}">
	<label data-error="wrong" data-success="right">E-mail</label>
</div>

<div class="input-field">
	<input type="number" step="0.5" name="comissao" class="validade" value="{{ isset($registro->comissao) ? $registro->comissao : '' }}">
	<label data-error="wrong" data-success="right">Comissão</label>
</div>

<br />
<br />
