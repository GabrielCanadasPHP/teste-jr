<input type="hidden" name="id" value="{{isset($registro->id) ? $registro->id : ''}}"/>

<div class="input-field">
	<input type="text" name="nome" class="validade" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
	<label data-error="wrong" data-success="right">Nome</label>
</div>

<div class="input-field">
    <input type="number" step="0.25" name="valor" class="validate" value="{{(isset($registro->valor) ? $registro->valor : '')}}">
    <label data-error="wrong" data-success="right">Valor (Ex: 234.90)</label>
</div>

<div class="input-field">
    <input type="number" name="quantidade" class="validate" value="{{(isset($registro->quantidade) ? $registro->quantidade : '')}}">
    <label data-error="wrong" data-success="right">Quantidade (Ex: 3)</label>
</div>

<br />
<br />
