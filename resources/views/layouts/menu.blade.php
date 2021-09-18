<li class="{{ Request::is('permohonans*') ? 'active' : '' }}">
    <a href="{{ route('permohonans.index') }}"><i class="fa fa-edit"></i><span>Senarai Permohonan <br> BK Covid 19</span></a>
</li>


{{-- <li class="{{ Request::is('pemohon*') ? 'active' : '' }}">
    <a href="{{ route('pemohon.index') }}"><i class="fa fa-edit"></i><span>Senarai Kes/Kontak Covid</span></a>
</li> --}}




{{-- <li class="{{ Request::is('kategoriPermohonans*') ? 'active' : '' }}">
    <a href="{{ route('kategoriPermohonans.index') }}"><i class="fa fa-edit"></i><span>Kategori Permohonan</span></a>
</li> --}}

{{-- <li class="{{ Request::is('jenisUploads*') ? 'active' : '' }}">
    <a href="{{ route('jenisUploads.index') }}"><i class="fa fa-edit"></i><span>Jenis Upload</span></a>
</li>
 --}}


<li class="{{ Request::is('permohonanKematians*') ? 'active' : '' }}">
    <a href="{{ route('permohonanKematians.index') }}"><i class="fa fa-edit"></i><span>Permohonan Kematians</span></a>
</li>


{{-- }}
<li class="{{ Request::is('logSemakan2s*') ? 'active' : '' }}">
    <a href="{{ route('logSemakan2s.index') }}"><i class="fa fa-edit"></i><span>Log Semakan2S</span></a>
</li>
--}}

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

