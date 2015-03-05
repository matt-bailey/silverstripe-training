<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
    <article>
        <h1>$Title</h1>
        <div class="content">$Content</div>
    </article>
    <% loop $Children %>
    <p>
        <% if $Photo %>
        <img src="$Photo.CroppedImage(50,50).URL" alt-"$Title">
        <% end_if %>
        <a href="$Link" title="$Title">$Title</a>
    </p>
    <% end_loop %>
    $Form
    $PageComments
</div>
