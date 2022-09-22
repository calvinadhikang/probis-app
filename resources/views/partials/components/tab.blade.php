<dir style="background-color: white; border-radius: 10px;">
    @foreach ($tabItem as $item)
        <div style="
        padding: 1%; 
        background-color: aquamarine;
        display: inline-block;">
            {{ $item }}
        </div>
    @endforeach
</dir>