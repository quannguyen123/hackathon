<?php
function selectMember($members, $selected = []) {
    foreach ($members as $members) {
            $id = $members['id'];
            $name = $members['name'];
            if (!empty($selected) && in_array($id, $selected)) {
                echo "<option value=$id selected='selected'>$name</option>";
            } else {
                echo "<option value=$id>$name</option>";
            }
    }
}

?>