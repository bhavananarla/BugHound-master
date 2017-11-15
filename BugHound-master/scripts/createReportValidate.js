function createReportValidate() {
    if (document.createRep.program.value.length < 2) {
        alert("Please select Program type");
        return false;
    }

    if (document.createRep.reportType.value.length < 2) {
        alert("Please select Report type");
        return false;
    }

    if (document.createRep.severity.value.length < 2) {
        alert("Please select Severity");
        return false;
    }

    if (document.createRep.probSummary.value.length < 2 || document.createRep.probSummary.value === " ") {
        alert("Problem Summary should contain at least 10 characters");
        return false;
    }

    if (document.createRep.problem.value.length < 2  || document.createRep.problem.value === " ") {
        alert("Please enter problem description");
        return false;
    }

    if (document.createRep.fix.value.length < 3) {
        alert("Please enter suggested fix column");
        return false;
    }
    if (document.createRep.reportedBy.value.length < 2) {
        alert("Please selected reported by field");
        return false;
    }
}

