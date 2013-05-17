var sAscii = " \!\"#$%&\'()*+,-.\/0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~";
var sHex = "0123456789abcdef";
function hex(i) {
 h = "";
 for (j = 0; j <= 3; j++) h += sHex.charAt ((i >> (j * 8 + 4)) & 0x0F) + sHex.charAt ((i >> (j * 8)) & 0x0F);
 return h;
}
function add(x, y) {
 return ((x & 0x7FFFFFFF) + (y & 0x7FFFFFFF)) ^ (x & 0x80000000) ^ (y & 0x80000000);
}
function R1(A, B, C, D, X, S, T) {
 q = add (add (A, (B & C) | ((~B) & D)), add (X, T));
 return add ((q << S) | (q >>> (32 - S)), B);
}
function R2(A, B, C, D, X, S, T) {
 q = add (add (A, (B & D) | (C & (~D))), add (X, T));
 return add ((q << S) | (q >>> (32 - S)), B);
}
function R3(A, B, C, D, X, S, T) {
 q = add (add (A, B ^ C ^ D), add (X, T));
 return add ((q << S) | (q >>> (32 - S)), B);
}
function R4(A, B, C, D, X, S, T) {
 q = add (add (A, C ^ (B | (~D))), add (X, T));
 return add ((q << S) | (q >>> (32 - S)), B);
}
function fMD5(sInp) {
 wLen = (((sInp.length + 8) >> 6) + 1) << 4;
 var X = new Array (wLen);
 j = 4;
 for (i = 0; (i * 4) < sInp.length; i++) {
  X [i] = 0;
  for (j = 0; (j < 4) && ((j + i * 4) < sInp.length); j++) 
   X [i] += (sAscii.indexOf (sInp.charAt ((i * 4) + j)) + 32) << (j * 8);
 }
 if (j == 4) X [i++] = 128;
 else X [i - 1] += 0x80 << (j * 8);
 for ( ; i < wLen; i++) 
  X [i] = 0;
 X [wLen - 2] = sInp.length * 8;
 a = 1732584193;
 b = 4023233417;
 c = 2562383102;
 d = 271733878;
 for (i = 0; i < wLen; i += 16) {
  aO = a;
  bO = b;
  cO = c;
  dO = d;
  a = R1 (a, b, c, d, X [i + 0], 7, 3614090360);
  d = R1 (d, a, b, c, X [i + 1], 12, 3905402710);
  c = R1 (c, d, a, b, X [i + 2], 17, 606105819);
  b = R1 (b, c, d, a, X [i + 3], 22, 3250441966);
  a = R1 (a, b, c, d, X [i + 4], 7, 4118548399); 
  d = R1 (d, a, b, c, X [i + 5], 12, 1200080426);
  c = R1 (c, d, a, b, X [i + 6], 17, 2821735955);
  b = R1 (b, c, d, a, X [i + 7], 22, 4249261313);
  a = R1 (a, b, c, d, X [i + 8], 7, 1770035416);
  d = R1 (d, a, b, c, X [i + 9], 12, 2336552879);
  c = R1 (c, d, a, b, X [i + 10], 17, 4294925233);
  b = R1 (b, c, d, a, X [i + 11], 22, 2304563134);
  a = R1 (a, b, c, d, X [i + 12], 7, 1804603682);
  d = R1 (d, a, b, c, X [i + 13], 12, 4254626195);
  c = R1 (c, d, a, b, X [i + 14], 17, 2792965006);
  b = R1 (b, c, d, a, X [i + 15], 22, 1236535329);
  a = R2 (a, b, c, d, X [i + 1], 5, 4129170786);
  d = R2 (d, a, b, c, X [i + 6], 9, 3225465664);
  c = R2 (c, d, a, b, X [i + 11], 14, 643717713);
  b = R2 (b, c, d, a, X [i + 0], 20, 3921069994);
  a = R2 (a, b, c, d, X [i + 5], 5, 3593408605);
  d = R2 (d, a, b, c, X [i + 10], 9, 38016083);
  c = R2 (c, d, a, b, X [i + 15], 14, 3634488961);
  b = R2 (b, c, d, a, X [i + 4], 20, 3889429448);
  a = R2 (a, b, c, d, X [i + 9], 5, 568446438);
  d = R2 (d, a, b, c, X [i + 14], 9, 3275163606);
  c = R2 (c, d, a, b, X [i + 3], 14, 4107603335);
  b = R2 (b, c, d, a, X [i + 8], 20, 1163531501);
  a = R2 (a, b, c, d, X [i + 13], 5, 2850285829);
  d = R2 (d, a, b, c, X [i + 2], 9, 4243563512);
  c = R2 (c, d, a, b, X [i + 7], 14, 1735328473);
  b = R2 (b, c, d, a, X [i + 12], 20, 2368359562);
  a = R3 (a, b, c, d, X [i + 5], 4, 4294588738);
  d = R3 (d, a, b, c, X [i + 8], 11, 2272392833);
  c = R3 (c, d, a, b, X [i + 11], 16, 1839030562);
  b = R3 (b, c, d, a, X [i + 14], 23, 4259657740);
  a = R3 (a, b, c, d, X [i + 1], 4, 2763975236);
  d = R3 (d, a, b, c, X [i + 4], 11, 1272893353);
  c = R3 (c, d, a, b, X [i + 7], 16, 4139469664);
  b = R3 (b, c, d, a, X [i + 10], 23, 3200236656);
  a = R3 (a, b, c, d, X [i + 13], 4, 681279174);
  d = R3 (d, a, b, c, X [i + 0], 11, 3936430074);
  c = R3 (c, d, a, b, X [i + 3], 16, 3572445317);
  b = R3 (b, c, d, a, X [i + 6], 23, 76029189);
  a = R3 (a, b, c, d, X [i + 9], 4, 3654602809);
  d = R3 (d, a, b, c, X [i + 12], 11, 3873151461);
  c = R3 (c, d, a, b, X [i + 15], 16, 530742520);
  b = R3 (b, c, d, a, X [i + 2], 23, 3299628645);
  a = R4 (a, b, c, d, X [i + 0], 6, 4096336452);
  d = R4 (d, a, b, c, X [i + 7], 10, 1126891415);
  c = R4 (c, d, a, b, X [i + 14], 15, 2878612391);
  b = R4 (b, c, d, a, X [i + 5], 21, 4237533241);
  a = R4 (a, b, c, d, X [i + 12], 6, 1700485571);
  d = R4 (d, a, b, c, X [i + 3], 10, 2399980690);
  c = R4 (c, d, a, b, X [i + 10], 15, 4293915773);
  b = R4 (b, c, d, a, X [i + 1], 21, 2240044497);
  a = R4 (a, b, c, d, X [i + 8], 6, 1873313359);
  d = R4 (d, a, b, c, X [i + 15], 10, 4264355552);
  c = R4 (c, d, a, b, X [i + 6], 15, 2734768916);
  b = R4 (b, c, d, a, X [i + 13], 21, 1309151649);
  a = R4 (a, b, c, d, X [i + 4], 6, 4149444226);
  d = R4 (d, a, b, c, X [i + 11], 10, 3174756917);
  c = R4 (c, d, a, b, X [i + 2], 15, 718787259);
  b = R4 (b, c, d, a, X [i + 9], 21, 3951481745);
  a = add (a, aO);
  b = add (b, bO);
  c = add (c, cO);
  d = add (d, dO);
 }
 return hex (a) + hex (b) + hex (c) + hex (d);
}
