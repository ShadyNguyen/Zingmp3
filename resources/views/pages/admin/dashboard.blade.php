<h1>
  <a href="{{ route('admin.auth.logout') }}">adasd</a>
</h1>
<p>Welcome, Admin: {{ Auth::guard('admin')->user()->name }}!</p>

@auth('admin')
    <p>asdasd</p>  
    <!-- Hiển thị nội dung cho quyền admin -->
    <p>asd</p>
    <p>Welcome, Admin: {{ Auth::guard('admin')->user()->name }}!</p>
@endauth