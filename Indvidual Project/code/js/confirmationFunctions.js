/**
 *******************************************************************
 * CLass		: CST336 SP-A-2015
 * Instructior	: Dr. Su Bude
 * Student		: Clarence Mitchell
 * Assignment	: Final Project
 * Description	: Javascript funcitons
 *
 *******************************************************************
*/

function confirmDelete(recordName) {
	var remove = confirm("Do you really want to delete " + recordName + "?");
	if (!remove) {
	event.preventDefault();
	}
}

function confirmLogout(event) {
	var logout = confirm("Do you really want to log out?");
	if (!logout) {
	event.preventDefault();
	}
	return logout
}


