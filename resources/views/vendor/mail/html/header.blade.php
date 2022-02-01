<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.duinenmars.nl/user/themes/solarize/images/favicon.ico" class="logo" alt="Stichting Duinenmars">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
