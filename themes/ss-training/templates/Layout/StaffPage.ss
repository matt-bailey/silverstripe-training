<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
    <article>
        <h1>$Title</h1>
        <% if $Photo %>
        <img class="staff-photo" src="$Photo.URL" alt="$Title">
        <% end_if %>
        <h2><strong>Job Title:</strong> $JobTitle</h2>
        <p><strong>Department:</strong> $Department.Title</p>
        <p><strong>Floor:</strong> $Department.Floor</p>
        <p><strong>Phone:</strong> $Phone</p>
        <p><strong>Email:</strong> <a href="mailto:$ObfuscateEmail" title="Email $Title">$ObfuscateEmail</a></p>
        <div class="content">$Content</div>
    </article>
    $Form
    $PageComments
</div>
