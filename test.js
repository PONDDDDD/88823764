const pcsc = require('pcsclite');

const pcscReader = pcsc();
let card;
let atr;

pcscReader.on('reader', function(reader) {
  console.log('Reader detected:', reader.name);

  reader.on('error', function(err) {
    console.log('Error:', err.message);
  });

  reader.on('status', function(status) {
    if (status.card) {
      if (!card) {
        console.log('Card inserted:', status.atr);
        card = reader;
        atr = status.atr;
        readCardData();
      }
    } else {
      if (card === reader) {
        console.log('Card removed');
        card = null;
        atr = null;
      }
    }
  });
});

function readCardData() {
  card.transmit(Buffer.from([0x00, 0xc0, 0x00, 0x00, 0x00]), 255, function(err, data) {
    if (err) {
      console.log('Error reading card data:', err.message);
    } else {
      console.log('Card data:', data);
      // send the data back to the client
      res.json({data: data.toString('hex')});
    }
  });
}
