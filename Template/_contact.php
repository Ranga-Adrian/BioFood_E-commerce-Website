
        <!-- Inceput sectiune Contact -->
        
        <section id="contact">

            <div class="col-15">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4747.813865052279!2d21.194969!3d45.847134!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x374d32aaf0db2093!2sPronat%20SRL!5e1!3m2!1sen!2sro!4v1629366144167!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
    
            <div class="col-16">
                <h4>Trimite-ne un mesaj</h4>
                <hr>
                <div class="form">
                    <form action="trimiteMail.php" method="POST" enctype=”multipart/form-data”>
                        <div class="col-17">
                            <label class="form-control-label">Nume</label>
                            <input type="text" id="Fname" name="nume" placeholder="Nume*">
                        </div>
                        <div class="col-18">
                            <label class="form-control-label">Adresa de email</label>
                            <input type="text" id="Email" name="email" placeholder="mailul@tau.com*">
                        </div>
                        <div class="col-19">
                            <label class="form-control-label">Subiect</label>
                            <input type="text" id="Subject" name="subiect" placeholder="Subiect">
                        </div>
    
                        <div class="col-20">
                            <label class="form-control-label">Mesaj</label>
                            <textarea name="mesaj" id="textarea" cols="100" rows="10" placeholder="Cum va putem ajuta ?"></textarea>
                        </div>
                        
                        <button type="submit" name="trimiteMail">Trimite mesaj</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Sfarsit sectiune Contact -->