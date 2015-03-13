describe( "train form validator", function () {
    it("incorrect time entry", function () {
        expect(validateForm('09','12/03/2015')).toEqual(false);
    });
    it("incorrect date entry", function () {
        expect(validateForm('0900','12/03/2015a')).toEqual(false);
    });
    it("incorrect time is NaN", function () {
        expect(validateForm('aa','12/03/2015a')).toEqual(false);
    });
    it("Correct time and date entered", function () {
        expect(validateForm('0900','12/03/2015')).toEqual(true);
    });


    
});