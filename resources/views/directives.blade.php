{{--
    BLADE DIRECTIVES - Learning Reference
    ======================================
    This file demonstrates Blade template directives in Laravel.
    The $tasks variable is passed from the route as an array of strings.
--}}

<h1>Tasks</h1>


{{-- =====================================================================
     1. OUTPUTTING VARIABLES
     =====================================================================
     {{ $variable }} — Blade's echo syntax. It runs the value through
     PHP's htmlspecialchars() automatically, preventing XSS.

     ⚠️ ERROR CASE: passing an array directly to {{ }} causes:
         "htmlspecialchars(): Argument #1 must be of type string, array given"
         because {{ }} expects a string, not an array.
--}}
{{-- {{ $tasks }} ← would throw the error above if uncommented --}}


{{-- =====================================================================
     2. DEBUGGING HELPERS
     =====================================================================
     Raw PHP alternatives (old way, works but messy):
         <?php var_dump($tasks) ?>          — dumps variable info
         <?php die(var_dump($tasks)) ?>     — dumps and stops execution

     Blade equivalents (preferred):
         @dump($tasks)   — dumps the variable without stopping execution
         @dd($tasks)     — dumps the variable AND stops execution (die + dump)
--}}
@dump($tasks)
{{-- @dd($tasks) — uncomment to dump and stop (useful for quick debugging) --}}

<p> Tasks Page </p>


{{-- =====================================================================
     3. CONDITIONALS
     =====================================================================
     Plain PHP style — works, but clutters the template:
--}}
<?php if (count($tasks)) : ?>
    <p>We Have Tasks To Do, And Number Of It Is <?= count($tasks) ?> Tasks </p>
<?php endif ?>

{{--
     Blade @if / @endif — cleaner, equivalent to the PHP block above.
     Use this style in Blade templates.
--}}
@if(count($tasks))
    <p>We Have Tasks To Do, And Number Of It Is <?= count($tasks) ?> Tasks </p>
@endif


{{-- =====================================================================
     4. LOOPS
     =====================================================================
     @foreach / @endforeach — iterates over an array.
--}}
<ul>
    @foreach($tasks as $task)
        <li> {{$task}} </li>
    @endforeach
</ul>

{{--
     @forelse / @empty / @endforelse — like @foreach but with a fallback.
     The @empty block renders when the array is empty, eliminating the
     need for a separate @if check around the loop.
--}}
<ul>
    @forelse($tasks as $task)
        <li> {{$task}} </li>
    @empty
        <li> No Task To Do </li>
    @endforelse
</ul>


{{-- =====================================================================
     5. @unless
     =====================================================================
     @unless(condition) is the exact inverse of @if(condition).
     Renders its content when the condition is FALSE.
     Reads more naturally than @if(!condition) in many cases.

     Example: show a "nothing to do" message only when the list is empty.
--}}
@unless(count($tasks) > 0)
    <p> Nothing To Do — Enjoy Your Day! </p>
@endunless

{{--
     Equivalent plain-PHP / @if version (less readable):
         @if(!count($tasks))
             <p> Nothing To Do — Enjoy Your Day! </p>
         @endif
--}}


{{-- =====================================================================
     FURTHER READING — Directives You Will Use Later
     =====================================================================

     @auth / @guest
     ---------------
     Check whether a user is logged in or visiting as a guest.
     No condition argument needed — Laravel resolves the auth state for you.

         @auth
             <a href="/dashboard">Dashboard</a>   {{-- only for logged-in users --}}
         @endauth

         @guest
             <a href="/login">Login</a>            {{-- only for visitors --}}
         @endguest

     -----------------------------------------------------------------------

     @can / @cannot
     ---------------
     Check whether the authenticated user is AUTHORISED to perform an action.
     Works with Laravel's Gate / Policy system.

         @can('edit', $post)
             <a href="/posts/{{ $post->id }}/edit">Edit</a>   {{-- only if allowed --}}
         @endcan

         @cannot('delete', $post)
             <p>You do not have permission to delete this post.</p>
         @endcannot

     The second argument ($post) is the model instance checked against the policy.
     The first argument ('edit') is the policy method name.

     -----------------------------------------------------------------------

     Rule of thumb:
         @auth / @guest  →  WHO the user is  (authenticated or not)
         @can / @cannot  →  WHAT the user may do (permissions / roles)
--}}
