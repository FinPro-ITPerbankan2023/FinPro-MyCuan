@props(['fieldName'])
<label for="{{ $fieldName }}">Pilih File:</label>
    <input type="file" name="{{ $fieldName }}" id="{{ $fieldName }}">