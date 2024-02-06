<?php

include './connections/connections.php';

// Assume $current_category holds the current category value
$current_category = "current_category";

$sql = "SELECT * FROM ticket_category ";
$result = $conn->query($sql);

$html .= '<select class="form-control" id="ticket_category" name="ticket_category" required>';

while ($category = $result->fetch_assoc()) {
    $category_name = htmlspecialchars($category['ticket_category']);
    $selected = ($category_name == $current_category) ? 'selected' : '';
    $html .= '<option value="' . $category_name . '" ' . $selected . '> ' . $category_name . '</option>';
}

$html .= '</select>';

// Output the generated HTML
echo $html;
?>


<div class="form-group">
    <label for="ticket_description">Ticket Description:</label>
    <textarea class="form-control" id="ticket_description" name="ticket_description" placeholder="Enter Ticket Description" rows="4" cols="50" required>' . htmlspecialchars($row['ticket_description']) . '</textarea>
</div>
<div class="form-group">
    <label for="ticket_priority">Ticket Priority:</label>
    <select class="form-control" id="ticket_priority" name="ticket_priority" required>
        <option value="Normal" <?php if ($row['ticket_priority'] === 'Normal') echo 'selected'; ?>>Normal</option>
        <option value="Priority" <?php if ($row['ticket_priority'] === 'Priority') echo 'selected'; ?>>Priority</option>
        <option value="Urgent" <?php if ($row['ticket_priority'] === 'Urgent') echo 'selected'; ?>>Urgent</option>
    </select>
</div>
