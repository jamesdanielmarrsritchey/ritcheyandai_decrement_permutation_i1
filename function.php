<?php
function previousPermutation($currentPermutation, $validCharacters) {
    if (empty($currentPermutation)) {
        return false;
    }

    $len = count($currentPermutation);
    $validLen = count($validCharacters);

    // Handle single element case
    if ($len === 1) {
        $currentIndex = array_search($currentPermutation[0], $validCharacters);
        return $currentIndex > 0 ? [$validCharacters[$currentIndex - 1]] : false;
    }

    // Iterate from the end to find the first character that is not the smallest
    for ($i = $len - 1; $i >= 0; $i--) {
        $currentIndex = array_search($currentPermutation[$i], $validCharacters);
        if ($currentIndex > 0) {
            // Found a character that can be decremented
            $currentPermutation[$i] = $validCharacters[$currentIndex - 1];
            // Set all characters after this one to the last valid character
            for ($j = $i + 1; $j < $len; $j++) {
                $currentPermutation[$j] = $validCharacters[$validLen - 1];
            }
            return $currentPermutation;
        }
    }

    // If the function hasn't returned by now, the permutation needs to shrink
    // Generate the largest permutation of the new length
    if ($len > 1) {
        return array_fill(0, $len - 1, $validCharacters[$validLen - 1]);
    }

    // If the permutation is already at its minimum length and smallest value, there's no previous permutation
    return false;
}
?>