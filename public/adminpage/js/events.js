// This is the Database of Upcoming Events
// Please Edit with Care.
//
// 8 Fields (surrounded by brackets[]) are used for EACH event:
// 	["Recurring", "Month", "Day", "Year", "StartTime", "EndTime", "Name", "Description"]
// 	Each event field must be be surrounded by quotation marks followed by a comma ("",) EXCEPT the "Description" field.
//	The "Description" field is surrounded by quotation marks only ("").
//
// Each event has a comma after the closing bracket IF another event is below it on the next line down.
//	Note: The last event in this file should NOT have a comma after the closing bracket
//
// The Recurring field uses:
//	"D" = Daily; "W" = Weekly; "M" = Monthly; "Y" = Yearly; "F" = Floating Holiday
//
// One Time only events should leave the Recurring field blank
//	(ex. "")
//
// Daily events do NOT require that anything be in the Month Day and Year fields
//	Everything in the Month Day and Year fields will be ignored
//
// Weekly events should have the day of the week field set to 1 - 7
//	1=Sunday, 2=Monday, 3=Tuesday, 4=Wednesday, 5=Thurday, 6=Friday, 7=Saturday
//
// "F"loating events uses:
//	the Month field for the Month.
//	the Day field as the Cardinal Occurrence
//		1=1st, 2=2nd, 3=3rd, 4=4th, 5=5th, 6=6th occurrence of the day listed next
//	the Year field as the Day of the week the event/holiday falls on
//		1=Sunday, 2=Monday, 3=Tuesday, 4=Wednesday, 5=Thurday, 6=Friday, 7=Saturday
//	example: "F",	"1",	"3",	"2", = Floating holiday in January on the 3rd Monday of that month.
//
//	Note: Easter has it's own special formula so Please don't change anything related to Easter below
//
// "Y"early events are specific dates that never change - the Year field is ignored
//	example - Christmas is: "12","25","",
events = new Array(
	["",	"8",	"22",	"2012",	"",	"",	"aaa",'AAA'],
	["",	"8",	"24",	"2012",	"",	"",	"bbb",'BBB'],
	["",	"8",	"26",	"2012",	"",	"",	"ddd",'CCC']/*,
	["F",	"1",	"3",	"2",	"1:00 AM",	"12:59 PM",	"Martin Luther King Day",	"Honors civil rights leader Rev Martin Luther King."],
	["Y",	"2",	"2",	"2005",	"1:00 AM",	"12:59 PM",	"Groundhog Day",	"If Philadelphia's groundhog 'Punxsutawney Phil' sees his shadow, there will be six more weeks of winter weather. If he does not see his shadow, there will be an early spring."],
	["Y",	"2",	"14",	"2005",	"1:00 AM",	"12:59 PM",	"Valentine's Day",	"Traditional celebration of love and romance, including the exchange of cards, candy, flowers, and other gifts."],
	["F",	"2",	"3",	"2",	"1:00 AM",	"12:59 PM",	"President's Day",	"Honors the birthdays of George Washington, Abraham Lincoln and other past American Presidents."],
	["F",	"3",	"0",	"0",	"1:00 AM",	"12:59 PM",	"Easter",	"Traditional celebration of the resurrection of Jesus Christ."],
	["Y",	"3",	"17",	"2005",	"1:00 AM",	"12:59 PM",	"St. Patrick's Day",	"A celebration of Irish heritage and culture, based on the Catholic feast of St. Patrick. Primary activity is simply the wearing of green clothing ('wearing of the green')."],
	["Y",	"3",	"22",	"2005",	"1:00 AM",	"12:59 PM",	"World Water Day",	"A day to promote appreciation of the world's most valuable commodity - water."],
	["Y",	"4",	"1",	"2005",	"1:00 AM",	"12:59 PM",	"April Fool's Day",	"A day to play tricks on or 'fool' family, friends, and coworkers, if so inclined. As Ecclesiastes says: 'There is a time for everything'; in this case, a time to be silly."],
	["F",	"5",	"2",	"1",	"1:00 AM",	"12:59 PM",	"Mother's Day",	"Honors mothers and motherhood (made a Federal Holiday by Presidential order)."],
	["F",	"5",	"3",	"7",	"1:00 AM",	"12:59 PM",	"Armed Forces Day",	"Celebrates the United States Army, Navy, Air Force and Marine Corps; formerly - each used to have separate days."],
	["F",	"5",	"4",	"2",	"1:00 AM",	"12:59 PM",	"Memorial Day",	"Honors the nation's war dead, and those we love who have passed away. Traditionally a time to decorate graves and remember those who have gone before us. Also marks traditional beginning of summer."],
	["Y",	"6",	"14",	"2005",	"1:00 AM",	"12:59 PM",	"Flag Day",	"Honors the American flag, encourages patriotism. Citizens are urged to fly the flag and study its traditions."],
	["F",	"6",	"3",	"1",	"1:00 AM",	"12:59 PM",	"Father's Day",	"Honors all Fathers and fatherhood."],
	["Y",	"7",	"4",	"2005",	"1:00 AM",	"12:59 PM",	"Independence Day",	"Celebrates our Declaration of Independence from England in 1776, usually called the Fourth of July."],
	["F",	"9",	"1",	"2",	"1:00 AM",	"12:59 PM",	"Labor Day",	"Celebrates the achievements of workers, giving them a day of rest - marks traditional end of summer."],
	["F",	"10",	"2",	"2",	"1:00 AM",	"12:59 PM",	"Columbus' Day",	"Honors the traditional discovery of the Americas by Christopher Columbus."],
	["Y",	"10",	"31",	"2005",	"1:00 AM",	"12:59 PM",	"Halloween",	"Celebrates All Hallow's Eve, decorations include jack o'lanterns, costume wearing parties, and candy - considered a pagan holiday by many Christians."],
	["Y",	"11",	"11",	"2005",	"1:00 AM",	"12:59 PM",	"Veteran's Day",	"Honors all veterans of the United States armed forces. A traditional observation is a moment of silence at 11 AM remembering those who fought for peace."],
	["F",	"11",	"4",	"5",	"1:00 AM",	"12:59 PM",	"Thanksgiving",	"A day to give thanks for your many blessings - traditionally for the Autumn harvest, and it marks the beginning of the 'holiday season'."],
	["Y",	"12",	"25",	"2005",	"1:00 AM",	"12:59 PM",	"Christmas",	"Celebration of the traditional day of Jesus' birth - God was made flesh and dwelt among us."]
*/// Please omit the final comma after the ] from the last line above unless you are going to add another event at this time.
);




