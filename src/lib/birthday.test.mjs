// Run: node --experimental-strip-types src/lib/birthday.test.mjs
import assert from "node:assert/strict";
import { parseTtl, daysUntilBirthday } from "./birthday.ts";

assert.equal(parseTtl("Semarang, 01 January 2005")?.getMonth(), 0);
assert.equal(parseTtl("Semarang, 01 January 2005")?.getDate(), 1);
assert.equal(parseTtl("no comma here"), null);
assert.equal(parseTtl("Kota, not a date"), null);
assert.equal(parseTtl(null), null);

const today = new Date(2026, 7, 18); // 18 Aug 2026
assert.equal(daysUntilBirthday(new Date(2005, 7, 18), today), 0, "birthday today");
assert.equal(daysUntilBirthday(new Date(2005, 7, 19), today), 1, "tomorrow");
assert.equal(daysUntilBirthday(new Date(2005, 7, 17), today), 364, "yesterday rolls to next year");

console.log("birthday.test: ok");
