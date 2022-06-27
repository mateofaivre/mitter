let inputShare         = document.querySelector( '.meet__gallery--btn' )
let previewFileWrapper = document.querySelector( '.status-main--preview' );

inputShare.addEventListener( 'change', () => {
	Array.from( inputShare.files ).forEach(
		file => {
			let createdImg = document.createElement( 'div' )
			let u          = URL.createObjectURL( file );
			
			createdImg.style.backgroundImage = `url(${u})`
			createdImg.setAttribute( "class", "status-main--preview--file" )
			previewFileWrapper.appendChild( createdImg )
			
			let img    = new Image;
			img.onload = () => {
				const ratio                  = img.width / img.height
				createdImg.style.aspectRatio = img.width + "/" + img.height
			};
			
			let previewFiles = document.querySelectorAll( '.status-main--preview--file' )
			
			if ( previewFiles.length > 1 && !previewFileWrapper.classList.contains( 'status-main--preview--multiple' ) ) {
				previewFileWrapper.classList.add( 'status-main--preview--multiple' )
			}
			
			
			img.src = u;
		}
	)
	
} )
