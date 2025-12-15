@php
    $user = Auth::user();
    $name = $user->name ?? '';  
    $arr = explode(' ',trim($name));
    $result = '';
    foreach($arr as $w){
        if($w != '')
        $result .= substr($w, 0,1);
    }  
@endphp
<div class="top-bar">
    <h6 style="margin: 0; color: #212529; font-weight: 600;">Document Management System</h6>
    <div class="user-info">
        <div class="user-avatar">{{strtoupper($result)}}</div> 
        <div>
            <div style="font-weight: 600; color: #212529;">{{ucwords($name)}}</div> 
            <div style="font-size: 12px; color: #6c757d;">Department Head</div>
        </div>
    </div>
</div>